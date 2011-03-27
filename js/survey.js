/**
 * @author Dean Chen
 */
 
var session_id;

Ext.setup({
	tabletStartupScreen: 'tablet_startup.png',
	phoneStartupScreen: 'phone_startup.png',
	icon: 'icon.png',
	glossOnIcon: false,
	onReady: function() {
		session_id = Ext.getDom('session_id').innerHTML;
		initForm();
	}
});

function initForm() {
	Ext.util.JSONP.request({
		url: 'http://vs.ocirs.com/rest/survey/groups',
		callbackKey: 'callback',
		callback: function(result) {
			result.forEach(getQuestions);
		}
	});
}


function getQuestions(group, index, survey) {
	Ext.util.JSONP.request({
		url: 'http://vs.ocirs.com/rest/survey/questions/' + group.id +
		"/" + session_id,
		callbackKey: 'callback',
		callback: function(result) {
			survey[index].questions = result;
			// check that all of the questions has been retrieved before constructiong the entire form
			var allSet = survey.every(function(element, index, array) {
				return element.questions !== undefined;
			});
			
			// once entire form has been retrieved construct the survey
			if (allSet) constructSurvey(survey);
		}
	});
};

function constructSurvey(survey) {
	var form;
	var cards = survey.map(createQuestionGroup);
	cards.push({html: "Survey complete"});

	form =  new Ext.Carousel({
		defaults: {
			cls: 'card'
		},
		items: cards
	});
	
	new Ext.Panel({
		fullscreen: true,
		layout: {
			type: 'vbox',
			align: 'stretch'
		},
		defaults: {
			flex: 1,
			id: 'education'
		},
		items: [form],
	});
}

function createQuestionGroup(group) {
	var questions = Object.keys(group.questions).map(createQuestion, group.questions);

	return {
		title: group.title,
		xtype: 'form',
		id: group.id,
		items: questions
	};
};

function createQuestion(key) {
	var question = this[key];
	var items = Object.keys(question.options).map(createField, question.options);
	
	return {
		xtype: 'fieldset',
		title: question.question,
		defaults: {
			xtype: 'radiofield',
			labelWidth: '60%'
		},
		items: items
	};
}

function createField(key) {
	var option = this[key];
	var field = {
		name: option.question_id,
		value: option.points,
		label: option.option_value
	};
	
	if (option.is_multi_answered === "1") {
		field.xtype = 'checkboxfield';
	}
	return field;
};
