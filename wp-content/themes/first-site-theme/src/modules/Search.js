import $ from 'jquery';

class Search{
    
    constructor(){
        //alert("Hhrllo")
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.search_field = "intern"
        //$("#search-term");
        this.events();
        this.resultDiv=$(".result");
    }

    events(){
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        this.search_field.on("keydown", this.senddata());
        
    }
    senddata(){
        $.getJSON(local_url.url+ '/wp-json/wp/v2/posts?search='+this.search_field,function (posts) {
            this.resultDiv.html(`
                <h2 class="search-overlay__section-title">General Information</h2>
                <ul class="link-list min-list">
                ${posts.map(items,()=>{
                    `<li><a href="${items.link}">${items.title.rendered}></li>`
                }).join(" ")
            }
                
                </ul>  
            `);
        })
    }

    openOverlay(){
        //console.log("Okay")
        this.searchOverlay.addClass("search-overlay--active");
        this.search_field.focus()
    }
    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
    }

    
    
}

export default Search;