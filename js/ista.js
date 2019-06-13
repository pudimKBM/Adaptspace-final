



        var userFeed = new Instafeed({
            get: 'user',
            userId: '7290986099',
            limit: 8,
            resolution: 'standard_resolution',
            accessToken: '7290986099.d780b8c.f7658e6278dc48e8b263400eb2e8ad28',
            sortBy: 'most-recent',
            template: '<div class="block4 wrap-pic-w"><img src="{{image}}" alt"IMG-INSTAGRAM> <a href="{{link}}" class="block4-overlay sizefull ab-t-l trans-0-4"><span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25"></a></div> ' 
        });
    
    
        userFeed.run();    


