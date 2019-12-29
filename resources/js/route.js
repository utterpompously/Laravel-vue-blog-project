import Dashboard from "./components/Admin/Dashboard";
import Catlist from "./components/Admin/Category/Catlist";
import Catadd from "./components/Admin/Category/Catadd";
import Catedit from "./components/Admin/Category/Catedit";
import Postedit from "./components/Admin/Post/Postedit";
import Postadd from "./components/Admin/Post/Postadd";
import Postlist from "./components/Admin/Post/Postlist";

export const routes = [
    // {
    //     path: '/homes',
    //     name: "Dashboard",
    //     component: Dashboard
    // },
    {
        path: '/category',
        component: Catlist
    },
    {
        path: '/addCategory',
        component: Catadd
    },
    {
        path: '/editCategory/:categoryid',
        component: Catedit
    },

    //post methods
    {
        path: '/post',
        component: Postlist
    },
    {
        path: '/addPost',
        component: Postadd
    },
    {
        path: '/editPost/:postid',
        component: Postedit
    }
];
