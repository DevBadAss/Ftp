import Request from "./ReqJS/Request.js";

// const req = new Request({ url: "http://localhost:3000/api/dir.php?action=delete&dirname=../tests&api-key=dev", method: "GET", res: "json", type: "application/json", data: null });
// const req = new Request({ url: "http://localhost:3000/api/dir.php?", method: "GET", res: "json", type: "application/json", data: null });
// req.pull(res => {
//     console.log(res)
// })

document.querySelector("#test").onchange = function() {
    const file = new FormData();
    file.append("file", this.files[0]);
    file.append("name", "test");
    file.append("dirname", "./")
    const FileRequest = new XMLHttpRequest();
    FileRequest.open("POST", "http://localhost:3000/api/upload.php?action=upload&api-key=de", true);
    FileRequest.responseType = "json";
    FileRequest.onreadystatechange = (res) => {
        console.log(res.currentTarget.response);
    };
    FileRequest.send(file);
}