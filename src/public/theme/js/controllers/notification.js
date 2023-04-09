import {Helpers} from '../helpers.js';
class Notification{

    constructor(){
        this.params = {};
        this.interval = null;
    }

    set(_key, _value){this.params[_key] = _value; return this;}

    get(_key){ if("undefined" === typeof this.params[_key]) return null; return this.params[_key]; }


    init(){
        let selector = document.createElement("div");
        this.set("el", selector);
        return this.prep();
    }

    prep(){
        let item = this.get("el");
        item.innerHTML = `
            <div class="css-notification-inner">
                <div class="css-the-notification-content">
                    <span class="icon"></span>
                    <div class="css-the-notification-content-inner message-container"></div>
                </div>
            </div>
        `;

        item.message_container = item.querySelector(".message-container");
        item.icon = item.querySelector(".icon");

        item.classList.add("js-floating-notification", "css-floating-notification");

        document.body.append(item);

        return this;

    }

    set_type(the_type){
        let item = this.get("el");
        item.setAttribute("data-type", the_type); 
        switch(the_type){
            case Helpers.data_types.info_message:
                item.icon.innerHTML = `<i class="fas fa-info-circle"></i>`;
                break;
            case Helpers.data_types.warning_message:
                item.icon.innerHTML = `<i class="fas fa-exclamation-circle"></i>`;
                break;

            case Helpers.data_types.success_message:
                item.icon.innerHTML = `<i class="fas fa-check-circle"></i>`;
                break;

            case Helpers.data_types.error_message:
                item.icon.innerHTML = `<i class="fas fa-exclamation-circle"></i>`;
                break;

            default:

        }
        return this;
    }
    set_message(the_message){this.get("el").message_container.innerHTML = the_message; return this;}

    info(the_message){
        return this
            .set_type(Helpers.data_types.info_message)
            .set_message(the_message);
    }

    warning(the_message){
        return this
            .set_type(Helpers.data_types.warning_message)
            .set_message(the_message);
    }

    success(the_message){
        return this
            .set_type(Helpers.data_types.success_message)
            .set_message(the_message);
    }

    error(the_message){
        return this
                .set_type(Helpers.data_types.error_message)
                .set_message(the_message);
    }

    hide(_timer){


        if("undefined" !== typeof _timer && _timer > 0){
            this.interval = setTimeout(() => {
               this.get("el").setAttribute("data-visible", Helpers.preset_values.negative);
            }, _timer);
        }else{
            this.get("el").setAttribute("data-visible", Helpers.preset_values.negative);
        }

        return this;
    }

    show(){

        if(null !== this.interval) clearInterval(this.interval);

        this.get("el").setAttribute("data-visible", Helpers.preset_values.positive);
        return this;

    }

}

export {Notification};
