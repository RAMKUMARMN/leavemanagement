$( "#lesson-from" ).datepicker({
    showOn: 'button',
    buttonImage: '/img/calendar.gif',
    buttonImageOnly: true,
    defaultDate: "+1w",
    changeMonth: true,
    changeYear: true,
    numberOfMonths: 1,
    dateFormat: 'yy-mm-dd',
    onClose: function( selectedDate ) {
        //$( "#lesson-to" ).datepicker( "option", "minDate", selectedDate );

        var date = $(this).datepicker('getDate');
        if (date){
            date.setDate(date.getDate() + 6);
            $( "#lesson-to" ).datepicker( "option", "minDate",date );
        }
    }
});
$( "#lesson-to" ).datepicker({
    showOn: 'button',
    buttonImage: '/img/calendar.gif',
    buttonImageOnly: true,
    defaultDate: "+1w",
    changeMonth: true,
    changeYear: true,
    numberOfMonths: 1,
    dateFormat: 'yy-mm-dd'

});