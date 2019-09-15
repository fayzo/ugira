   function country() {
        var xmlhttp = new XMLHttpRequest();
        var url = "assets/country/country.json";
        xmlhttp.open("post", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                var myDiv = document.getElementById("myCountry");
                //Create and append select list
                var selectList = document.createElement("select");
                selectList.id = "country";
                selectList.name = "country";
                selectList.className = "form-control";
                myDiv.appendChild(selectList);

                var ordered = {};
                Object.keys(myObj).sort().forEach(function(key) {
                    ordered[key] = myObj[key];
                });
                // var ordered =Object.keys(myObj);
                // ordered.sort().forEach(function(key) {
                //     ordered[key] = myObj[key];
                // });

                for (var x in ordered) {
                    var option = document.createElement("option");
                    option.value = ordered[x];
                    option.text = x;
                    selectList.appendChild(option);
                }
                // console.log(ordered);
                // console.log(myObj);
            }
        };
    //    document.getElementById("select").addEventListener("keypress", rwandaMap); 
    }
    window.onload = country();

function provinceMap() {
        var xmlhttp = new XMLHttpRequest();
        var url = "assets/rwanda_map/province.json";
        xmlhttp.open("post", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                var myDiv = document.getElementById("myProvince");
                //Create and append select list  
                var selectList = document.createElement("select");
                selectList.id = "location_province";
                selectList.name = "location_province";
                selectList.className = "form-control";
                myDiv.appendChild(selectList);

                var ordered = {};
                Object.keys(myObj).sort().forEach(function(key) {
                    ordered[key] = myObj[key];
                });
                // var ordered =Object.keys(myObj);
                // ordered.sort().forEach(function(key) {
                //     ordered[key] = myObj[key];
                // });

                for (var x in ordered) {
                    var option = document.createElement("option");
                    option.value = ordered[x];
                    option.text = x;
                    selectList.appendChild(option);
                }
                // console.log(ordered);
                // console.log(myObj);
            }
        };
    }
window.onload = provinceMap();

function districtsMap() {
        var xmlhttp = new XMLHttpRequest();
        var url = "assets/rwanda_map/districts.json";
        xmlhttp.open("post", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                var myDiv = document.getElementById("myDistricts");
                //Create and append select list  
                var selectList = document.createElement("select");
                selectList.id = "location_districts";
                selectList.name = "location_districts";
                selectList.className = "form-control";
                myDiv.appendChild(selectList);

                var ordered = {};
                Object.keys(myObj).sort().forEach(function(key) {
                    ordered[key] = myObj[key];
                });
                // var ordered =Object.keys(myObj);
                // ordered.sort().forEach(function(key) {
                //     ordered[key] = myObj[key];
                // });

                for (var x in ordered) {
                    var option = document.createElement("option");
                    option.value = ordered[x];
                    option.text = x;
                    selectList.appendChild(option);
                }
                // console.log(ordered);
                // console.log(myObj);
            }
        };
    }
window.onload = districtsMap();

function sectorsMap() {
        var xmlhttp = new XMLHttpRequest();
        var url = "assets/rwanda_map/sectors.json";
        xmlhttp.open("post", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                var myDiv = document.getElementById("mySectors");
                //Create and append select list  
                var selectList = document.createElement("select");
                selectList.id = "location_sectors";
                selectList.name = "location_sectors";
                selectList.className = "form-control";
                // selectList.className = "custom-select d-block w-100 form-control";
                myDiv.appendChild(selectList);

                var ordered = {};
                Object.keys(myObj).sort().forEach(function(key) {
                    ordered[key] = myObj[key];
                });
                // var ordered =Object.keys(myObj);
                // ordered.sort().forEach(function(key) {
                //     ordered[key] = myObj[key];
                // });

                for (var x in ordered) {
                    var option = document.createElement("option");
                    option.value = ordered[x];
                    option.text = x;
                    selectList.appendChild(option);
                }
                // console.log(ordered);
                // console.log(myObj);
            }
        };
    }
window.onload = sectorsMap();