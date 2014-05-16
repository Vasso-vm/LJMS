jQuery(document).ready(function(){

    /**
    * Handle confirmable links
    * Each confirmable link must contain a data-confirm-text attribute
    */
    $('body').on('click','a.confirmable', function(){
		
        //.as-form.confirmable will be handled by as-form handler		
        return ! $(this).hasClass('as-form') && confirm($(this).data('confirm-text'));
    })
	
    /**
    * Transform links.as-form to form after clicking.
    * Similar to link_to helper in the Symfony 1.4
    * 
    * data-method = "delete|put|post"
    * data-csrf = "name:value"
    */
    $('body').on('click', 'a.as-form', function(){
		
        //handle confirmable links
        if ($(this).hasClass('confirmable') && ! confirm($(this).data('confirm-text')))
        {
            return false;
        }
		
        var $form = $('<form/>').hide();
		
        //form options
        $form.attr({
            'action' : $(this).attr('href'),
            'method':'post'
        })
        //adding the _method hidden field
        $form.append($('<input/>',{
            type:'hidden',
            name:'_method'
        }).val($(this).data('method')));
		
        //adding a CSRF if needs
        if ($(this).data('csrf'))
        {
            var csrf = $(this).data('csrf').split(':');
            $form.append($('<input/>',{
                type:'hidden',
                name:csrf[0]
            }).val(csrf[1]));
        }
		
        //add form to parent node
        $(this).parent().append($form);
		
        $form.submit();
		
        return false;
    })
});