import React from "react";
import MainMenuFoods from '../MainMenuFoods/MainMenuFoods'
import foods from '../../datas'

import "./MainMenu.css";

export default function MainMenu() {
    return (
        <div className="main__menu">
            <p className="main__menu-title">دسته بندی ها</p>
            <div className="main__menu-foods">
                {foods.map((food) => <MainMenuFoods title={food.title} image={food.img} key={food.id}/>)}
            </div>
        </div>
    );
}
