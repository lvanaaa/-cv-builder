$(document).ready(function(){
    $('.repeater').repeater({
        initEmpty: false,
        defaultValues: {
            'text.input': ''
        },
        show: function(){
            $(this).slideDown();
        },
        hide: function(deleteElement){
            $(this).slideUp(deleteElement);
            setTimeout(function(){
                generateCV();
            }, 500);
        },
        isFirstItemUndeletable: true
    });
});