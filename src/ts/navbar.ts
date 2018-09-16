declare var themeOffsetTop: number;
declare var wordpressOffsetTop: number;

export class Navbar
{
    private headerBar: HTMLElement;
    constructor()
    {
        var header: HTMLElement = document.getElementsByTagName('header')[0];
        this.headerBar = (<any>header.getElementsByClassName('fixed-top'))[0];
        window.addEventListener('scroll',() => { 

            if(this.scrollY > this.topOffset)
            {
                this.headerBar.style.top = this.wordpressOffset+"px";
                this.headerBar.style.position = "fixed";
            }
            else
            {
                this.headerBar.style.top = "0px";
                this.headerBar.style.position = "absolute";
            }

         });
    }
    private get scrollY(): number
    {
        return window.scrollY;
    }

    private get topOffset(): number
    {
        return themeOffsetTop;
    }

    private get wordpressOffset(): number
    {
        return wordpressOffsetTop;
    }
}