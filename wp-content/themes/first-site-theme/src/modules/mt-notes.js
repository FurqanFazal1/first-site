import $ from 'jquery';

class Notes{
    constructor(){
        this.edit=$(".edit-note");
        this.Events();
    }

    Events(){
        

        this.edit.on("click",(e)=>
        {
            var id = $(e.target).parents("li");
            if(id.data("state")=="editable"){
                console.log("Edit ho")
                this.ReadOnlyFunction(id)   
            }
            else{
                console.log("Edit na ho")
              
                this.EditFunction(id);
                
            }
        })


        $(".delete-note").on("click",this.DeleteFunctions);
        $(".up-note").on("click",this.SaveFunction);
        $(".submit-note").on("click",this.createFunction);

    }

    createFunction(e){

       var newPost={

            'title':$('.new-note-title').val(),
            'content':$('.note-note-body').val(),
            'status':'publish'

        }
        
         $.ajax({
             beforeSend:(xhr)=>{
                 xhr.setRequestHeader('X-WP-Nonce', local_url.nonce);
             },

             url: local_url.url+'/wp-json/wp/v2/note/',
             type:'POST',
             data: newPost,
             success: (response)=>{
                $(`
                <li data-id="${response.id}">
                <input readonly type="text" value="${response.title.raw}" class="note-title-field">

                <span class="edit-note"><i class="fa fa-pencil"> Edit</i></span>
                <span class="delete-note"><i class="fa fa-trash-o"> Delete</i></span>

                <textarea readonly name="" id="" cols="30" rows="10" value="" class="note-body-field">${response.content.raw}</textarea>
                <span class="up-note" style="color:black; display:none"><i class="fa fa-arrow-right">Save</i></span>
            </li>
                `).prependTo('#my-notes').hide().slideDown();
                $('.new-note-title, .new-note-body').val('');
                
                console.log(response);
                 console.log("Success");
                 
             },
             error: (response)=>{
                 console.log(response);
                 console.log("Error")
             }
         });

    }

    ReadOnlyFunction(id){
        id.find('.edit-note').html('<i class="fa fa-pencil" aria-hidden="true"> Edit</i>');
        id.find('.note-title-field').attr('readonly','readonly').removeClass('note-active-field');
        id.find('.note-body-field').attr('readonly','readonly').removeClass('note-active-field');
        id.find('.up-note').css("display","none")
        id.data("state", "cancel")

    }

    EditFunction(id){
        
        id.find('.edit-note').html('<i class="fa fa-times" aria-hidden="true"> Cancel</i>');
        id.find('.note-title-field').removeAttr('readonly').addClass('note-active-field');
        id.find('.note-body-field').removeAttr('readonly').addClass('note-active-field');
        id.find('.up-note').css("display","block")
        id.data("state", "editable")

    }

   

    SaveFunction(e){

        var id = $(e.target).parents("li");
        var idd = $(e.target).parents("li").attr("data-id");

       var outputData={
            'title':id.find('.note-title-field').val(),
            'content':id.find('.note-body-field').val()
        }
        console.log(idd);
         $.ajax({
             beforeSend:(xhr)=>{
                 xhr.setRequestHeader('X-WP-Nonce', local_url.nonce);
             },

             url: local_url.url+'/wp-json/wp/v2/note/'+idd,
             type:'POST',
             data: outputData,
             success: (response)=>{
                console.log(response);
                 console.log("Success")
                this.ReadOnlyFunction(id);
                 
             },
             error: (response)=>{
                 console.log(response);
                 console.log("Error")
             }
         });


    }
    DeleteFunctions(e){
        var id = $(e.target).parents("li").attr("data-id");
        var idd = $(e.target).parents("li").attr("data-id");
         $.ajax({
             beforeSend:(xhr)=>{
                 xhr.setRequestHeader('X-WP-Nonce', local_url.nonce);
             },

             url: local_url.url+'/wp-json/wp/v2/note/'+id,
             type:'DELETE',
             success: (response)=>{
                 console.log(response);
                 console.log("Success")
                 idd.slideUp();
             },
             error: (response)=>{
                 console.log(response);
                 console.log("Error")
             }
         });

    }
}
export default Notes;