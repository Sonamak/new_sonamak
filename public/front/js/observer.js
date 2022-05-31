
if(!!window.IntersectionObserver){
    let observer = new IntersectionObserver((entries, observer) => { 
        entries.forEach(entry => {
            let observed_element = entry.target;
            if(entry.isIntersecting){
                

                $(observed_element).find('img').each(function(){
                    $(this).attr('src',$(this).attr('data'))
                })
                observed_element.classList.remove("ghost");
                $(observed_element).children('img').each(function(){
                    $(this).attr('src',$(this).attr('data'));
                })
                observer.unobserve(entry.target);
            }
        });
    }, {rootMargin: "0px 0px -200px 0px"});
    document.querySelectorAll('.intersector').forEach(img => { observer.observe(img) });
  }

  
if(!!window.IntersectionObserver){
    let imgObserver = new IntersectionObserver((entries, observer) => { 
        entries.forEach(entry => {
            let observed_element = entry.target;
            if(entry.isIntersecting){
                

                $(observed_element).find('img').each(function(){
                    $(this).attr('src',$(this).attr('data'))
                })
                observed_element.classList.remove("ghost");
                $(observed_element).children('img').each(function(){
                    $(this).attr('src',$(this).attr('data'));
                })
                observer.unobserve(entry.target);
            }
        });
    }, {rootMargin: "0px 0px -200px 0px"});
    document.getElementsByTagName('img').forEach(img => { imgObserver.observe(img) });
  }
  