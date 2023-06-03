$(document).ready(function() {
					
    $("#search").change(function(e) {
           hideAll();
                $(e.target.options).removeClass();
                var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
                $selectedOption.addClass('selected');
           $('#' + $selectedOption.val()).show();
    });
});

function hideAll() {
    $("#kadin").hide();
    $("#erkek").hide();
            
}