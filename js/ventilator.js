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
  var educationCarousel = new Ext.Carousel({
      defaults: {
          cls: 'card'
      },
      items: [{
          html: '<h1>Carousel</h1><p>Navigate the two carousels on this page by swiping left/right or clicking on one side of the circle indicators below.</p>'
      },
      {
          title: 'Tab 2',
          html: '2'
      },
      {
          title: 'Tab 3',
          html: '3'
      }]
  });
        
  return educationCarousel;
}
