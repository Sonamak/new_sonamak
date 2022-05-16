function tour_box(element, container) {
    let name = ($('html').attr('lang') == 'en') ? element.title_en : element.title_fr;
    let thumbnail = element.gallaries.find(x => x.use_for == 'thumbnail');
    let description = ($('html').attr('lang') == 'en') ? element.description_en.replace(/<[^>]*>?/gm, '') : element.description_fr.replace(/<[^>]*>?/gm, '');
    let category = "";
    let category_id = "";
    let currency = "";
    let lowest_price = "Not Set";
    let room = "Not Set";
    let duration = ($('html').attr('lang') == 'en') ? element.duration_text_in_en : element.duration_text_in_fr;
    let has_category = element.category
    let cat_class = (!has_category) ? 'd-none' : '';

    if (element.category) {
        category = ($('html').attr('lang') == 'en') ? element.category.name_en : element.category.name_fr;
        category_id = element.category.id
    }


    if (element.lowest_price_package) {
        currency = get_currency();

        if (currency == 'cad') {

            lowest_price = element.lowest_price_package.cad_price;
            room = element.lowest_price_package.room_type;

        } else if (currency == 'usd') {

            lowest_price = element.lowest_price_package.usd_price;
            room = element.lowest_price_package.room_type;

        } else {

            lowest_price = element.lowest_price_package.eur_price;
            room = element.lowest_price_package.room_type;

        }

        room = room.toLowerCase().replace(' ', '_')

        console.log(room,'room')
    }

    if (element.category) {
        category = ($('html').attr('lang') == 'en') ? element.category.name_en : element.category.name_en
    }

    room = get_local(room) ?? 'Not Set';

    $(container).append(
        `
        <div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
            <div class="box_grid">
                <figure>
                    <a href="tour-details.php">
                        <img src="/storage/tour/medium/${thumbnail.name}" class="img-fluid"
                            alt="" width="800" height="533">
                        <div class="read_more">
                            <span>${get_local('view_details')}</span>
                        </div>
                    </a>
                    <a href="/tour/discover?category=${category_id}">
                        <small class="${cat_class}">
                            ${category}
                        </small>
                    </a>
                </figure>
                <div class="wrapper">
                    <h3>
                        <a href="tour-details.php">
                            ${name}
                        </a>
                    </h3>
                    <p>
                        ${description.substring(0,80)}
                    </p>
                    <span class="price">${get_local('from')}<strong> ${lowest_price + ' ' + currency} </strong> /  </strong> ${room}</span>
                </div>
                <ul class="d-flex">
                    <li><i class="icon_clock_alt mx-2"></i>${duration}</li>
                </ul>
            </div>
        </div>

        `
    )

}


function tour_wide_box(element,container) {
    let name = ( $('html').attr('lang') == 'en') ? element.title_en : element.title_fr;
    let thumbnail = element.gallaries.find(x => x.use_for == 'thumbnail');
    let description =  ( $('html').attr('lang') == 'en') ? element.description_en.replace(/<[^>]*>?/gm, '') : element.description_fr.replace(/<[^>]*>?/gm, '');
    let category = null;
    let currency = "";
    let lowest_price = "Not Set";
    let room = "Not Set"; 
    let duration = ( $('html').attr('lang') == 'en') ? element.duration_text_in_en : element.duration_text_in_fr;
    let has_category = element.category
    let cat_class = (!has_category) ? 'd-none' : '';

    if (element.category) {
        let category = ( $('html').attr('lang') == 'en') ? element.category.name_en : element.category.name_fr;
    }
    
    if ( element.lowest_price_package ) {
        currency = get_currency();

        if ( currency == 'cad' )  {

            lowest_price = element.lowest_price_package.cad_price;
            room = element.lowest_price_package.room_type;

        } else if ( currency == 'usd' ) {

            lowest_price = element.lowest_price_package.usd_price;
            room = element.lowest_price_package.room_type;

        } else {

            lowest_price = element.lowest_price_package.eur_price;
            room = element.lowest_price_package.room_type;

        }

        room = room.toLowerCase().replace(' ','_')


    }
    if ( element.category) {
        category = ( $('html').attr('lang') == 'en') ? element.category.name_en : element.category.name_en
    }

    room = get_local(room) ?? 'Not Set';

    $(container).append(
        `
        <div class="box_list isotope-item popular">
        <div class="row no-gutters">
                <div class="col-lg-5">
                    <figure>
                        <small class="${cat_class}">
                            ${category}
                        </small>
                        <a href="tour-details.php">
                            <img src="/storage/tour/medium/${thumbnail.name}" class="img-fluid" alt="" width="800" height="533">
                            <div class="read_more"><span>Read more</span></div>
                        </a>
                    </figure>
                </div>
                <div class="col-lg-7">
                    <div class="wrapper">
                        <h3><a href="tour-details.php">${name}</a></h3>
                        <p>
                        ${description.substring(0,300)}
                        </p>
                        <span class="price">${get_local('from')}<strong> ${lowest_price + ' ' + currency} </strong> /  </strong> ${room}</span>
                    </div>
                    <ul>
                        <li><i class="icon_clock_alt mx-2"></i>${duration}</li>
                    </ul>
                </div>
            </div>
            </div>
        `
    )
}
