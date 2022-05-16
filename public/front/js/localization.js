function localized_en() {

    return {
        'single_room': 'Single Room',
        'double_room': 'Double Room',
        'trible_room': 'Triple Room',
        'write_review': 'Write Review',
        'from': 'From',
        'view_details': 'View Details'
    }


}

function localized_fr() {

    return {
        'single_room': 'Chambre simple',
        'double_room': 'Chambre double',
        'trible_room': 'Chambre triple',
        'write_review': 'Ecrire une critique',
        'view_details': 'Voir les détails',
        'from': 'Depius'
    }

}

function get_local(value) {


    if  ( $('html').attr('lang') == 'en') {
        return localized_en()[value]
    } else {
        return localized_fr()[value]
    }

}