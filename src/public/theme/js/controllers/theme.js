import { Base } from "../base.js";

class Theme extends Base{

    load_script(path){

        var s = document.createElement("script");
        s.src = path;
        s.setAttribute("async", true);
        document.body.append(s);
        return this;

    } // function load script 


}

export {Theme};
