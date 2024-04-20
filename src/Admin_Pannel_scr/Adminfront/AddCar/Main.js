//for showing image 
let imgBox = document.getElementById("imgBox");
let loadFile = function(event){
    imgBox.style.backgroundImage = "url("+URL.createObjectURL(event.target.files[0])+")";
}
let CarName,
    CarSeats,
    CarCapacity,
    CarTransmission,
    StartLocation,
    EndLocation,
    FromToPrice,
    PricePerKm,
    CarType,
    ImgUrl;

let preview = document.getElementById("SavedImage");
function submit(){
    //?This is the code that gets image url 
    Img = document.getElementById("imgBox");
    ImgStyle = window.getComputedStyle(Img);
    Image = ImgStyle.backgroundImage;
    ImageUrl = Image.slice(5, -2);
    //?---------------------
    CarName = document.getElementById('CarName').value;
    CarSeats = document.getElementById('CarSeats').value;
    CarCapacity = document.getElementById('CarCapacity').value;
    CarTransmission = document.getElementById('CarTransmission').value;
    StartLocation = document.getElementById('StartLocation').value;
    EndLocation = document.getElementById('EndLocation').value;
    FromToPrice = document.getElementById('FromToPrice').value;
    PricePerKm = document.getElementById('PricePerKm').value;
    CarType = document.getElementById("CarType").value;

    
    console.log(`Image Address is  : ${ImageUrl}`);
    console.log(`CarName = ${CarName}\n
                CarSeats = ${CarSeats}\n
                CarCapacity = ${CarCapacity}\n
                CarTransmission = ${CarTransmission}\n
                StartLocation = ${StartLocation}\n
                EndLocation = ${EndLocation}\n
                FromToPrice = ${FromToPrice}\n
                PricePerKm = ${PricePerKm}\n
                CarType = ${CarType}`);

    
}

document.getElementById("AddCarOpen").addEventListener("click", function() {
    window.location.href = "Adminfront/AddCar/index.php";
});


