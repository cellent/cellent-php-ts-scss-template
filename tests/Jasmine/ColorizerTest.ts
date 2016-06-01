/// <reference path="../../typings/index.d.ts"/>
/// <reference path="../../public/js/Colorizer.ts"/>

describe("colorizer test", function() {
    let colorizer = new Colorizer();
    it("should determine if a string is a hex color", function() {
        expect(colorizer.isHexColor("#fff")).toBe(true);
        expect(colorizer.isHexColor("blue")).toBe(false);
    });
});
