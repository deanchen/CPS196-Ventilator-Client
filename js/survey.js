/**
 * @author Dean Chen
 */
var session_id;
var survey;
Ext.setup({
	tabletStartupScreen: 'tablet_startup.png',
	phoneStartupScreen: 'phone_startup.png',
	icon: 'icon.png',
	glossOnIcon: false,
	onReady: function() {
		session_id = Ext.getDom('session_id').innerHTML;
		console.log(session_id);
		var form = createForm();
	}
});

var form;

function createForm() {
	Ext.util.JSONP.request({
		url: 'http://vs.ocirs.com/rest/survey/groups',
		callbackKey: 'callback',

		callback: function(result) {
			processGroups(result);
		}
	});
}

function processGroups(data) {
	survey = data;
	for (var i = 0; i < data.length; i++) {
		storeQuestions(data[i], i);
	}
};

function storeQuestions(group, index) {
	$.ajax({
		url: "http://vs.ocirs.com/rest/survey/questions/" + group.id +
		"/" + session_id,
		dataType: "jsonp",
		success: function(data) {
			survey[index].questions = data;
			console.log(data);
			var test = true;
			for (var i = 0; i < survey.length; i++) {
				if (survey[i].questions === undefined) {
					test = false;
				}
			}
			if (test) {
				constructForm();
			}
		}
	});
};

function constructForm() {
	var cards = [];
	for (var i = 0; i < survey.length; i++) {
		cards.push(createQuestions(survey[i], i));
	}

	cards.push({html: "Survey complete"});

	console.log(cards);
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

function createQuestions(group, index) {
	var questions = [];
	var groupQuestions = group.questions;
	for (var question in groupQuestions) {
		questions.push(createQuestion(groupQuestions[question]));
	}

	var form = {
		title: group.title,
		xtype: 'form',
		id: group.id,
		items: questions
	};
	return form;
};

function createQuestion(question) {
	var items = [];
	for (var index in question.options) {
		if(question.options.hasOwnProperty(index)) {
			var option = question.options[index];
			items.push({
				name: option.question_id,
				value: option.points,
				label: option.option_value
			});
		}
	};
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
