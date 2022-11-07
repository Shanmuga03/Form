const express = require("express");
const bodyParser = require("body-parser");
const mongoose = require("mongoose");
const app = express();

app.use(bodyParser.urlencoded({extended: true}));

mongoose.connect("mongodb+srv://sam:ShanmugaSun123@sam.lhwhksh.mongodb.net/?retryWrites=true&w=majority", {useNewUrlParser: true}, {useUnifiedTopology: true})

const notesSchema={
    dd: String,
    mm: String,
    yy: String,
    gender: String,
    phno: String
}

const Note=mongoose.model("Note",notesSchema);

app.get("/",function(req,res){
    res.sendFile(__dirname + "/login3.html");  
})

app.post("/",function(req,res){
    let newNote=new Note({
        dd: req.body.dd,
        mm: req.body.mm,
        yy: req.body.yy,
        gender: req.body.gender,
        phno: req.body.phno
    });
    newNote.save();
    res.sendFile(__dirname + "/last.html");
})

app.listen(3000,function(){
    console.log("Listening to port 3000");
})


