declare var themeOffsetTop: number;
declare var wordpressOffsetTop: number;

export class Navbar
{
    public headerBar: HTMLElement;
    constructor()
    {
        var header: HTMLElement = document.getElementsByTagName('header')[0];
        this.headerBar = (<any>header.getElementsByClassName('fixed-top'))[0];
        
        this.onscroll(this);
        window.addEventListener('scroll',() => { 
            this.onscroll(this);
         });
    }
    private onscroll(navbar: Navbar): void {
        if(navbar.scrollY > navbar.topOffset)
        {
            navbar.headerBar.style.top = navbar.wordpressOffset+"px";
            navbar.headerBar.style.position = "fixed";
        }
        else
        {
            navbar.headerBar.style.top = "0px";
            navbar.headerBar.style.position = "absolute";
        }
    }

    public get scrollY(): number
    {
        return window.scrollY;
    }

    public get topOffset(): number
    {
        return themeOffsetTop;
    }

    public get wordpressOffset(): number
    {
        return wordpressOffsetTop;
    }
}