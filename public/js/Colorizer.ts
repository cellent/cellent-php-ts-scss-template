class Colorizer {
    public isHexColor(color: string): boolean {
        return "#" === color.charAt(0);
    }

    public colorize(selector: string, color: string): void {
        $(selector).css("color", color);
    }
}
