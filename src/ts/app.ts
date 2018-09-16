import * as jQuery from 'jquery';
import { Navbar } from './navbar';

class App
{
    private scriptsObj: Map<string,object> = new Map<string,object>();
    constructor()
    {
        let navbar = new Navbar();
        this.scriptsObj.set('navbar',navbar);
    }
}




jQuery(document).ready(() => {
    (<any>window)['app'] = new App();
});