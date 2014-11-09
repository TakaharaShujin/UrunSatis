jQuery.noConflict();
jQuery(document).ready(function($) {
	// BOOTSTRAP KODLARI
/*
	$(window).bind('beforeunload',function(){
		$("#processing-modal").modal('show');
	});
*/
	// DİĞER JQUERY ODLARI
	$('a[href=#top]').click(function(){ $('body,html').animate({ scrollTop: 0}, 400); return false; });

	$("#statusFilter a").click(function(){
		var filterVal = $(this).data('filter');
		if (filterVal == "-") {
			$("#filterTable tbody tr").show();
		}else{
			$("#filterTable tbody tr").each(function(){
				var trFilter = $(this).data('status');
				$(this).hide();
				if (filterVal == trFilter) {
					$(this).show();
				};
			});
		}
		return false;
	});

	$("#alphaFilter a").click(function(){
		var filterVal = $(this).data('filter');
		if (filterVal == "-") {
			$("#filterTable tbody tr").show();
		}else{
			$("#filterTable tbody tr").each(function(){
				var trFilter = $(this).data('char');
				$(this).hide();
				if (filterVal == trFilter) {
					$(this).show();
				};
			});
		}
		return false;
	});

	$('#alternateTrigger button').click(function(){
		var getID = $(this).val();
		$("#processing-modal").modal('show');
		$.ajax({
			type 		: 'post',
			url 		: '/KishiheidaNewGen/ajax/selectAlternate',
			dataType 	: 'html',
			data 		: 'alternateID=' + getID,
			success 	: function(response){
				$('#alternateTV').html(response);
				$("#processing-modal").modal('hide');
			}
		});
	});

	$('#alternateTrigger button:first').trigger('click');


    $('.list-group.checked-list-box .list-group-item').each(function () {
        
        // Settings
        var $widget = $(this),
            $checkbox = $('<input type="checkbox" class="hidden" />'),
            color = ($widget.data('color') ? $widget.data('color') : "primary"),
            style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };
            
        $widget.css('cursor', 'pointer')
        $widget.append($checkbox);

        // Event Handlers
        $widget.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });
          

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $widget.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $widget.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$widget.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $widget.addClass(style + color + ' active');
            } else {
                $widget.removeClass(style + color + ' active');
            }
        }

        // Initialization
        function init() {
            
            if ($widget.data('checked') == true) {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
            }
            
            updateDisplay();

            // Inject the icon if applicable
            if ($widget.find('.state-icon').length == 0) {
                $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
            }
        }
        init();
    });
    
    $('#get-checked-data').on('click', function(event) {
        event.preventDefault(); 
        var checkedItems = {}, counter = 0;
        $("#check-list-box li.active").each(function(idx, li) {
            checkedItems[counter] = $(li).text();
            counter++;
        });
        $('#display-json').html(JSON.stringify(checkedItems, null, '\t'));
    });



    var $btnSets = $('#responsive'),
    $btnLinks = $btnSets.find('a');
 
    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });

    $("[rel='tooltip']").tooltip();    
 
    $('.view').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});