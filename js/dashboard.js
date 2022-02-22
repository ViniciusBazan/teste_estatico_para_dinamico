function dashboard(origin){
    let target = document.getElementById("tableColor");
    let color = target.classList;

    
    switch (origin) {
        case "c":
            color.remove("grey");
            color.remove("green");
            color.remove("purple");
            color.add("blue");
            break;

        case "u":
            color.remove("grey");
            color.remove("blue");
            color.remove("purple");
            color.add("green");
            break;

        case "f":
            color.remove("grey");
            color.remove("blue");
            color.remove("green");
            color.add("purple");
            break;
    
        default:
            break;
    }
}