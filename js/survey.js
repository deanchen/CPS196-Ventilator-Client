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
		Ext.Msg.alert('Please Complete This Survey', 'It will help your doctor better understand your family\'s situation.', Ext.emptyFn);
		session_id = Ext.getDom('session_id').innerHTML;
		initForm();
	}
});

function initForm() {
	Ext.Ajax.request({
		url: '/api/rest/survey/groups',
		success: function(result) {
			Ext.util.JSON.decode(result.responseText).forEach(getQuestions);
		} 
	});
}


function getQuestions(group, index, survey) {
	Ext.Ajax.request({
		url: '/api/rest/survey/questions/' + group.id +
		"/" + session_id,
		success: function(result) {
			survey[index].questions = Ext.util.JSON.decode(result.responseText);
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
	cards.push({ html:''});

	form =  new Ext.Carousel({
		id: 'carousel',
		defaults: {
			cls: 'card'
		},
		items: cards
	});
	
	// submit previous results on card switch
	form.on({
		beforecardswitch: {
			scope: this,
			fn: function(container, newCard, oldCard, index) {
				if (index > form.getActiveIndex()) {
					var allSet = Object.keys(oldCard.getValues()).every(
						function(element, index, array) {
							if (this[element]!==null) {
								return (this[element].length) > 0;
							} else {
								return false;
							}
						}
					, oldCard.getValues());
					console.log(oldCard.getValues());
					if (allSet) {
						var params = {};
						Object.keys(oldCard.getValues()).forEach(
						function(element, index, array) {
							if (this[element]!==undefined && this[element]!==null && Ext.isArray(this[element]) && this[element].length > 1) {
								console.log(this[element].length);
								params[element] = this[element].join(',');
							}
						}
						, oldCard.getValues());
						oldCard.submit({
							params: params
						});
						
						if (index === cards.length-1) {
							// replace last slide with a message
							Ext.Msg.alert('Thank You', 
								'Your responses has been recorded and sent to your loved one\'s doctor. Press ok to see your survey results.', 
								function(){
									Ext.Ajax.request({
										url: '/api/rest/survey/completed/' + session_id,
										method: 'POST'
									})
								}
							);
						}
					} else {
						Ext.Msg.alert('Incomplete Response', 'Please answer all questions before continuing to next page.', function() {form.prev()});
					}
				}
			}
		}
	});
			
	new Ext.Panel({
		fullscreen: true,
		layout: {
			type: 'vbox',
			align: 'stretch'
		},
		defaults: {
			flex: 1,
			id: 'survey'
		},
		items: [form],
	});
	

}

function createQuestionGroup(group) {
	var questions = Object.keys(group.questions).map(createQuestion, group.questions);
	
	return {
		title: group.title,
		xtype: 'form',
		id: "form" + group.id,
		items: questions,
		url: '/api/rest/survey/questions/' + group.id + '/' + session_id
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
	console.log(option);
	var field = {
		name: option.question_id,
		value: option.option_id,
		label: option.option_value
	};
	
	if (option.is_multi_answered === "1") {
		field.xtype = 'checkboxfield';
		field.name = option.question_id;
	}
	return field;
};
