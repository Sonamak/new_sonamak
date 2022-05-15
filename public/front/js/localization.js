function localized_en() {

    return {
        'single_room': 'Single Room',
        'double_room': 'Double Room',
        'trible_room': 'Triple Room',
    }


}

function localized_fr() {

    return {
        'single_room': 'Chambre simple',
        'double_room': 'Chambre double',
        'trible_room': 'Chambre triple',
    }

}

function get_local(value) {


        if  ( $('html').attr('lang') == 'en') {
            console.log('en');
            return localized_en()[value]
        } else {
            console.log('fr');
            return localized_fr()[value]
        }

}