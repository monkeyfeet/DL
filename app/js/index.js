
// Compile our scss
// This 'includes' the SCSS index file which webpack then reads and 
// compiles into the necessary css files
//require('../scss/index.scss');

/**
 * On page load
 **/
$(document).ready( function(){
	// Start your website!
	console.log('Loaded!');
	PageSetup();
});

function PageSetup(){
    MobileNav();
    ToggleContent();
}

function MobileNav(){

    $('.hamburglar').click(function(){
        if( $(this).hasClass('open') ){
            $('.mainnav').animate({left: '100%'});
        } 
        else{
            $('.mainnav').animate({left: '0px'});
        }
        $(this).toggleClass('open');
    });

    /*
    $('.hamburglar.closed').on('click',  function(){
        $(this).removeClass('closed');
        $(this).addClass('open');
        $('.mainnav').animate({left: '0px'});
    });

    $('.hamburglar.open').on('click', function(){
        $(this).removeClass('open');
        $(this).addClass('closed');
        $('.mainnav').animate({left: '100%'});
    });
    */
}

function ToggleContent(){
    $('.toggle-button').click(function(e){
    	e.preventDefault();
        var link = $(this).parent('a');
        var wrapper = link.parents('.togglable');
        wrapper.children('.togglable-content').slideToggle(200);
        link.toggleClass('open');
    	$(this).toggleClass('fa-caret-down');
    	$(this).toggleClass('fa-caret-up');
    });
}
