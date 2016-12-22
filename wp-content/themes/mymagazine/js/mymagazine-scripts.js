jQuery(document).ready(function($) {
    
    // Main Nav animation
    $(".header-menu").click(function(){
        $("#menu-primary").slideToggle();
    });
    
    function navigation_toggle(){ 
        $('.main-nav li.menu-item-has-children a').click(function(event){
            event.stopPropagation();
            var selfClick = $(this).parent().find('ul:first').is(':visible');
            if(!selfClick) {
                $(this).parent().parent().find('li ul:visible').slideToggle();
            } 
            $(this).parent().find('ul:first').slideToggle();           
        });          
    };
    
    navigation_toggle();
    
    // Search box mobile animation
    
    $('.mobile-icons li span.genericon-search').click(function(){
        $('.pre-header form.search-form').toggleClass('comein');    
    });
    
    // Login mobile animation
    
    $('.mobile-icons li span.genericon-user').click(function(){
        $('.pre-header a.log').toggleClass('comein');    
    });
    
    // Print button
    
    $('.article-content .genericon-print').click(function(){
        window.print();    
    });
    
    

    $(".rslides").responsiveSlides({
        auto: false,             // Boolean: Animate automatically, true or false
        speed: 500,            // Integer: Speed of the transition, in milliseconds
        timeout: 8000,          // Integer: Time between slide transitions, in milliseconds
        pager: false,           // Boolean: Show pager, true or false
        nav: true,             // Boolean: Show navigation, true or false
        random: false,          // Boolean: Randomize the order of the slides, true or false
        pause: true,           // Boolean: Pause on hover, true or false
        pauseControls: true,    // Boolean: Pause when hovering controls, true or false
        prevText: "<",   // String: Text for the "previous" button
        nextText: ">",       // String: Text for the "next" button
        maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
        navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
        manualControls: "",     // Selector: Declare custom pager navigation
        namespace: "rslides",   // String: Change the default namespace used
        before: function(){},   // Function: Before callback
        after: function(){}     // Function: After callback
    });
        







        
})