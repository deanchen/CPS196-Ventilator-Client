Ext.setup({
    tabletStartupScreen: 'tablet_startup.png',
    phoneStartupScreen: 'phone_startup.png',
    icon: 'icon.png',
    glossOnIcon: false,
    onReady: function() {
        // Create a Carousel of Items
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
  for (var i = 1; i <= 8; i++) {
    items.push({html: educationContent.apply({cardNum: i})});
  }
  var educationCarousel = new Ext.Carousel({
      defaults: {
          cls: 'card'
      },
      items: items,
  });
        
  return educationCarousel;
}
