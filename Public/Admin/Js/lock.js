var Lock = function () {

    return {
        //main function to initiate the module
        init: function () {

             $.backstretch([
		        mypublic + "/Admin/Images/bg/1.jpg",
		        mypublic + "/Admin/Images/bg/2.jpg",
		        mypublic + "/Admin/Images/bg/3.jpg",
		        mypublic + "/Admin/Images/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		      });
        }

    };

}();
