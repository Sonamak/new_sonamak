function get_currency()
{
    if  ( $('html').attr('currency') == 'usd') {
        return '$'
    } else if($('html').attr('currency') == 'eur') {
        return '€';
    }  else {
        return 'CAD'
    }
}