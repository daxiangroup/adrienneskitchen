/*$(document).ready(function(){
    $(window).scroll(function(){
        console.log($('#primary').scrollTop());
        if ($('#primary').scrollTop() < 0) {
            $('#primary').css({
                'top': Math.max(0,45-$('#primary').scrollTop()),
                'positoin': 'fixed'
            });
        }
    });
});
*/

var SiteWidget = {
    settings: {
        neonSign: $('#neon-sign'),
        neonSignOffset: Number($('#neon-sign').css('top').replace(/[^-\d\.]/g, '')),
        sidePanels: $('#side-panels .content'),
        sidePanelsOffset: Number($('#side-panels .content').css('top').replace(/[^-\d\.]/g, '')),
        scrolledSubNavigation: $('#container .scrolled-sub-navigation'),
        //scrolledSubNavigationKeypointMax: -368,
        scrolledSubNavigationKeypointMagic: 17,
        scrolledSubNavigationVisiblePoint: $('#access').height(),
        scrolledSubNavigationKeypointMax: ((parseInt($('#side-panels .content .stopper').offset().top) - 17 - $('#access').height()) * -1),
    },

    init: function() {
        var obj = this.settings;
        this.bindScrollingActions();
        this.scrollingActions();
        /*
        alert($('#side-panels .content .stopper').offset().top);
        alert($('#side-panels .content').offset().top);
        alert( $('#side-panels .content .stopper').offset().top - $('#side-panels .content').offset().top);
        */
    },

    scrollingActions: function() {
        var obj = this.settings;

        var scroller   = -Math.abs($(window).scrollTop());
        var fixedSign   = obj.neonSignOffset + scroller;
        obj.neonSign.css('top', String(fixedSign + 'px'));

        if (scroller <= obj.scrolledSubNavigationKeypointMax) {
            obj.sidePanels.addClass('fixed');
            //obj.sidePanels.css('top', (obj.scrolledSubNavigationVisiblePoint + obj.scrolledSubNavigationKeypointMagic) + 'px');
            obj.sidePanels.css('top', (($('#side-panels .content .stopper').offset().top - $('#side-panels .content').offset().top - obj.scrolledSubNavigationVisiblePoint - obj.scrolledSubNavigationKeypointMagic) * -1) + 'px');
        }
        else {
            obj.sidePanels.removeClass('fixed');
            obj.sidePanels.css('top', '');
        }

        var scrolledSubNavigationHeight = obj.scrolledSubNavigation.outerHeight();
        var scrolledSubNavigationKeypointMin = obj.scrolledSubNavigationKeypointMax + scrolledSubNavigationHeight;
        var scrolledSubNavigationHiddenPoint = obj.scrolledSubNavigationVisiblePoint - scrolledSubNavigationHeight;
//        var scrolledSubNavigationDifference = scrolledSubNavigationHiddenPoint + obj.scrolledSubNavigationKeypointMax;

        if (scroller <= scrolledSubNavigationKeypointMin && scroller >= obj.scrolledSubNavigationKeypointMax) {
            //var offset = Math.abs(scroller) + scrolledSubNavigationKeypointMin - 3;
            var offset = scrolledSubNavigationHiddenPoint + Math.abs(scroller - scrolledSubNavigationKeypointMin);
            //var offset = Math.abs(scroller) - 316;
            obj.scrolledSubNavigation.css('top', offset + 'px');
        }

console.log('Scroller: ' + scroller);
console.log('Offset: ' + offset);
console.log('Height: ' + scrolledSubNavigationHeight);
console.log('VisiblePoint: ' + obj.scrolledSubNavigationVisiblePoint);
//console.log('Adjusted: ' + Number(Math.abs(scroller) + scrolledSubNavigationKeypointMin));
//console.log('Adjusted: ' + Number(scroller - scrolledSubNavigationDifference));
console.log('KeypointMin: ' + scrolledSubNavigationKeypointMin);
console.log('KeypointMax: ' + obj.scrolledSubNavigationKeypointMax);
console.log('HiddenPoint: ' + scrolledSubNavigationHiddenPoint);
console.log('--------------------------------');


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

var FrontPageWidget = {
    init: function() {
        var boxes = $('#container').find('.recipe-box');
        if (boxes.length) {
            boxes.each(function() {
                var img = $(this).find('.img img');
                var imgWidth = img.width();
                var imgHeight = img.height();
                var ratio = imgWidth / imgHeight;
                var newWidth = Number(imgWidth + 20);
                var newHeight = Math.floor(Number(newWidth / ratio));

                /*
                alert(imgWidth + ' : ' + imgHeight + ' : ' + ratio);
                alert(newWidth + ' : ' + newHeight);
                */

                $(this).hover(
                    function() {
                        img.animate({
                            width: newWidth + 'px',
                            height: newHeight + 'px',
                            top: '-=10px',
                            left: '-=10px',
                        }, 200);
                    },
                    function() {
                        img.animate({
                            width: imgWidth + 'px',
                            height: imgHeight + 'px',
                            top: '+=10px',
                            left: '+=10px',
                        }, 200);
                    }
                );
            });
        }
    },
};

$(document).ready(function() {
    SiteWidget.init();
    RecipeWidget.init();
    FrontPageWidget.init();
});