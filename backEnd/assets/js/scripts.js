jQuery(document).ready(
    function($){
        /******** Open Create User ********/
        $(".createUserButton").click(function () {
            $("#createUser").fadeIn(700);
            $(".toBlur").addClass("blur");
        });
        /******** Close Create User ********/
        $("#closeCreateUser").click(function () {
            $("#createUser").fadeOut(700);
            $(".toBlur").removeClass("blur");
        });
        /******** Open CreateCategory ********/
        $(".createCategoryButton").click(function () {
            $("#createCategory").fadeIn(700);
            $(".toBlur").addClass("blur");
            //$("p").css("background-color", "yellow");
        });
        /******** Close CreateCategory ********/
        $("#closeCreateCategory").click(function () {
            $("#createCategory").fadeOut(700);
            $(".toBlur").removeClass("blur");
        });
        /******** Open CreateCard ********/
        $(".createCardButton").each(function(){
            $(this).click(function () {
                $("#createCard").fadeIn(700);
                $(".toBlur").addClass("blur");
                /******** Put ID to Button ********/
                var categoryid=$(this).data("categoryid");
                $("#catID").val(categoryid);
            });
        });
        /********Close CreateCard ********/
        $("#closeCreatePage").click(function () {
            $("#createCard").fadeOut(700);
            $(".toBlur").removeClass("blur");
        });
        /******** Close EditUser ********/
        $("#closeEditUser").click(function () {
            window.location="http://localhost:8888/admin/users.php";
        });
        /******** Close EditCategory ********/
        $("#closeEditCategory").click(function () {
            window.location="http://localhost:8888/admin/categorys.php";
        });
        /******** Close EditPage ********/
        $("#closeEditPage").click(function () {
            window.location="http://localhost:8888/admin/pages.php";
        });
        /******** DropDown In Pages ********/
        $(".pageCategoryBox").each(function(){
            var pageBox = this;
            $(pageBox).find('.pageCategoryName').click(function(){
                $(pageBox).find('.pageCategoryBody').toggle();
                $(pageBox).find('.bar').toggleClass('animate');
            })
        });
    }
);