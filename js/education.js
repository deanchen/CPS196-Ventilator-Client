Ext.setup({
    tabletStartupScreen: 'tablet_startup.png',
    phoneStartupScreen: 'phone_startup.png',
    icon: 'icon.png',
    glossOnIcon: false,
    onReady: function() {
        // Create a Carousel of Items
		Ext.Msg.alert('', 
			'This will take about 30 minutes.<br /><br />Please read each page.<br /><br />Navigate by swipping left or right.<br /><br />Progress indicator is on the bottom.',
			Ext.emptyFn
		);

        var educationCarousel = createEducationCarousel();
	
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
            items: [educationCarousel],
        });
    }
});

function createEducationCarousel() {
	var educationContent = Ext.XTemplate.from('education');
	var items = new Array();
	for (var i = 1; i <= 10; i++) {
		items.push({html: educationContent.apply({cardNum: i})});
	}
  
	items.push({ html:''});
  
  
	var educationCarousel = new Ext.Carousel({
      defaults: {
          cls: 'card'
      },
      items: items,
  });
  
	educationCarousel.on({
		beforecardswitch: {
			scope: this,
			fn: function(container, newCard, oldCard, index) {
				if (index === items.length-1) {
					window.location = "survey.php";
				}
			}	
		}
	});
        
  return educationCarousel;
}
