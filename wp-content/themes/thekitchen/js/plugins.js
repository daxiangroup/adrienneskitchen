var SiteWidget = {
    settings: {
        header: $('#header'),
        neonSign: $('#neon-sign'),
        neonSignOffset: Number($('#neon-sign').css('top').replace(/[^-\d\.]/g, '')),
        sidePanels: $('#side-panels .content'),
        sidePanelsStopper: $('#side-panels .content .stopper'),
        scrolledSubNavigation: $('#container .scrolled-sub-navigation'),
        //scrolledSubNavigationKeypointMax: -368,
        scrolledSubNavigationKeypointMagic: 17,
        scrolledSubNavigationVisiblePoint: $('#access').height(),
        scrolledSubNavigationKeypointMax: 0,
    },

    init: function() {
        var obj = this.settings;

        // If we have a 'stopper' box in the #side-panels, then we want to do some
        // setting of variables. Otherwise we'll get into some errors in the JS.
        if (obj.sidePanelsStopper.length) {
            obj.scrolledSubNavigationKeypointMax = ((parseInt(obj.sidePanelsStopper.offset().top) - obj.scrolledSubNavigationKeypointMagic - $('#access').height()) * -1);
        }
        this.bindScrollingActions();
        this.scrollingActions();
        this.socialMediaSetup();
    },

    socialMediaSetup: function() {
        // Facebook
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        // Twitter
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
        // Google+
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/platform.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    },

    scrollingActions: function() {
        var obj = this.settings;

        var scroller   = -Math.abs($(window).scrollTop());
        var fixedSign   = obj.neonSignOffset + scroller;
        obj.neonSign.css('top', String(fixedSign + 'px'));

        if (!obj.sidePanelsStopper.length) { return false; }

        if (scroller <= obj.scrolledSubNavigationKeypointMax) {
            theTop = parseInt(obj.header.offset().top) + parseInt(obj.header.height()) + obj.scrolledSubNavigationKeypointMax - 19;

            obj.sidePanels.addClass('fixed');
            obj.sidePanels.css('top', theTop + 'px');
        }
        else {
            obj.sidePanels.removeClass('fixed');
            obj.sidePanels.css('top', '');
        }

        var scrolledSubNavigationHeight = obj.scrolledSubNavigation.outerHeight();
        var scrolledSubNavigationKeypointMin = obj.scrolledSubNavigationKeypointMax + scrolledSubNavigationHeight;
        var scrolledSubNavigationHiddenPoint = obj.scrolledSubNavigationVisiblePoint - scrolledSubNavigationHeight;

        if (scroller <= scrolledSubNavigationKeypointMin && scroller >= obj.scrolledSubNavigationKeypointMax) {
            var offset = scrolledSubNavigationHiddenPoint + Math.abs(scroller - scrolledSubNavigationKeypointMin);
            obj.scrolledSubNavigation.css('top', offset + 'px');
        }

        if (scroller < obj.scrolledSubNavigationKeypointMax) {
            obj.scrolledSubNavigation.css('top', String(obj.scrolledSubNavigationVisiblePoint + 'px'));
        }

        if (scroller > scrolledSubNavigationKeypointMin) {
            obj.scrolledSubNavigation.css('top', String(scrolledSubNavigationHiddenPoint + 'px'));
        }

    },

    bindScrollingActions: function() {
        var obj = this.settings;

        // Adjusting the Neon Sign to scroll with the page. It needs to have a
        // higher z-index than the navigation bar fixed to the top of the screen.
        $(window).scroll(function() {
            SiteWidget.scrollingActions();
        });
    },
    /*
    bindUIActions: function() {
        obj.menuControl.on('click', function() {
            ResponsiveWidget.animate();
        });
    },
    */

    getDirection: function() {
        obj = this.settings;

        if (obj.menuControl.hasClass('toggle-up')) {
            obj.menuControl.addClass('toggle-down');
            obj.menuControl.removeClass('toggle-up');

            var icon = obj.menuControl.find('.direction');
            icon.addClass('icon-arrow-down');
            icon.removeClass('icon-arrow-up');

            obj.direction = '+';
            obj.opacity = 0.5;
            obj.menuOpacity = 1;
        }
        else if (obj.menuControl.hasClass('toggle-down')) {
            obj.menuControl.addClass('toggle-up');
            obj.menuControl.removeClass('toggle-down');

            var icon = obj.menuControl.find('.direction');
            icon.addClass('icon-arrow-up');
            icon.removeClass('icon-arrow-down');

            obj.direction = '-';
            obj.opacity = 1;
            obj.menuOpacity = 0;
        }
    },

    animate: function() {
        this.getDirection();

        obj.footer.animate({
            height: obj.direction + '=200px',
            width: '100%',
        }, obj.speed);
        obj.contentContainer.fadeTo(obj.sped, obj.opacity);
        obj.menuContainer.fadeTo(obj.speed, obj.menuOpacity);
    }
};

var RecipeWidget = {
    settings: {
        description: $('#container .recipe-description'),
        descriptionHighlight: $('#container .recipe-description p'),
        ingredients: $('#container .recipe-ingredients'),
        scrolledNavigationLastLink: $('.scrolled-sub-navigation li'),
    },

    init: function() {
        var obj = this.settings;

        if (obj.description.length) {
            obj.isRecipe = true;
            this.alterDisplay();
        }
    },

    alterDisplay: function() {
        var obj = this.settings;

        obj.descriptionHighlight.first().addClass('highlight-intro');
        obj.scrolledNavigationLastLink.last().addClass('last');
    }
};

// Placeholder for SOMEthing on the front page
var FrontPageWidget = {
    init: function() {
    },
};

$(document).ready(function() {
    SiteWidget.init();
    RecipeWidget.init();
    FrontPageWidget.init();
});