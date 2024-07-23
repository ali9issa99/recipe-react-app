import React from "react";
import "./style.css";
import Button from "../../base/Button";

const RecipeCard = ({ color, category, onMakeFavorite }) => {
  return (
    <div className={`flex column rounded ${color}-bg quiz`}>
      <div className="flex full-width">
        <p className="white-text">{category}</p>
      </div>

      <Button
        text={"add to favorites"}
        bgColor="white-bg"
        textColor="black-text"
        onMouseClick={onMakeFavorite}
      />
    </div>
  );
};
export default RecipeCard;