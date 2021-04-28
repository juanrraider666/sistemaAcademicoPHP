// JavaScript Document


  $(document).ready(function() {
        $('.company_select').multiselect({
            includeResetOption: true,
            includeResetDivider: true,
            includeSelectAllOption: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            enableFullValueFiltering: true,
              buttonText: function(options, select) {
      if (options.length == 0) {
           $('.list_filter').empty();
           $('.list_filter').removeClass('m_b20');
          return 'Select Option';
      }
      else {
          var selected = '';
          var selectedspan = '';
           
          options.each(function() {
              selectedspan += "<span>" +$(this).text() + '</span> ';
              selected += $(this).text() + ', ';
          });
         
           $('.list_filter').addClass('m_b20');
        
          
          return $('.list_filter').html( selectedspan.substr (0, selectedspan.length -2) ), selected.substr (0, selected.length -2);
          
         
      }
            },
            numberDisplayed: 5,
		});
      
      
      
      
       $('.multiselect-reset .btn').click(function(){
          $('.list_filter').empty();
           $('.list_filter').removeClass('m_b20');
                   
                });
      
      
      
      
      
        $('.mult_hpe_select').multiselect({
         includeResetOption: true,
            includeResetDivider: true,
            includeSelectAllOption: true,
			numberDisplayed: 5,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            enableFullValueFiltering: true,
       
            
		});
      
      
   
      

      
      
    });





$(document).ready(function(){
    
   


   
$(".open_filter").click(function(){
    $(this).toggleClass("active"); 
    $(".content_checkboxes").stop().slideUp(300);
   
    $(this).closest(".hpe_filter").find(".content_checkboxes").stop().slideToggle(300);
});

$("#btn_search").click(function(){
    $(".content_checkboxes").stop().slideUp(300);
      
});
    
    
    

 $(".select_all").click(function(){
    $(this).closest(".hpe_filter").find('input:checkbox').prop('checked', this.checked); 
});    
 
    
    
    /* center modal */
function centerModals($element) {
	"use strict";
  var $modals;
  if ($element.length) {
    $modals = $element;
  } else {
    $modals = $('.modal-vcenter:visible');
  }
  $modals.each( function() {
    var $clone = $(this).clone().css('display', 'block').appendTo('body');
    var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
    top = top > 0 ? top : 0;
    $clone.remove();
    $(this).find('.modal-content').css("margin-top", top);
  });
}
$('.modal-vcenter').on('show.bs.modal', function() {
	"use strict";
  centerModals($(this));
});
$(window).on('resize', centerModals);
/* fin center modal */	


/* refresh video al cerrar */
$('#modal-video').on('hidden.bs.modal', function () {
 $iframe = $(this).find( 'iframe' );
 $iframe.attr('src', $iframe.attr('src'));
 });
	/* fin refresh video al cerrar */	
    
    
    

 
    
    
    
    
    
    
    
    
	}); 

    
    
    
    
  