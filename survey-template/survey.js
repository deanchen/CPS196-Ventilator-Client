/**
 * @author Dean Chen
 */
 Ext.setup({
    tabletStartupScreen: 'tablet_startup.png',
    phoneStartupScreen: 'phone_startup.png',
    icon: 'icon.png',
    glossOnIcon: false,
    onReady: function() {
    	console.log("test");
        var form = createForm();
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
});

function createForm() {
	console.log("test");
	Ext.regModel('Groups', {
    fields: ['id', 'title']
	});
	
	var store = new Ext.data.Store({
	    model: 'Groups',
	    proxy: {
	        type: 'scripttag',
	        url : 'http://vs.ocirs.com/survey/group',
	        callbackParam: 'callback',
	        reader: {
	            type: 'json'
	        }
	    }
	});
	store.load();
	console.log(store);

	var question1 = createQuestion();
	var form =  new Ext.Carousel({
      defaults: {
          cls: 'card'
      },
		    items: [question1, {
		        title: 'Sliders',
		        xtype: 'form',
		        items: [{
		            xtype: 'fieldset',
		            defaults: {
		                labelAlign: 'right'
		            },
		            items: [{
		                xtype: 'sliderfield',
		                name: 'value',
		                label: 'Value'
		            }, {
		                xtype: 'togglefield',
		                name: 'enable',
		                label: 'Enable'
		            }]
		        }]
		    }]
		});

	return form;
};

function createQuestion() {
	var form = {
		        title: 'Basic',
		        xtype: 'form',
		        id: 'basicform',
		        items: [{
		            xtype: 'fieldset',
		            title: 'Favorite color',
		            defaults: {
		                xtype: 'radiofield',
		                labelWidth: '35%'
		            },
		            items: [{
		                name: 'color',
		                value: 'red',
		                label: 'Red'
		            }, {
		                name: 'color',
		                label: 'Blue',
		                value: 'blue'
		            }, {
		                name: 'color',
		                label: 'Green',
		                value: 'green'
		            }, {
		                name: 'color',
		                label: 'Purple',
		                value: 'purple'
		            }]
		        }]
		    };
		    return form;
}
