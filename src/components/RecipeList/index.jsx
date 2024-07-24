

import React, { useEffect, useState } from "react";
// import { quizRemote } from "../../data_source/remote/quiz_remote";
import RecipeCard from "../RecipeCard";
// import { useNavigate } from "react-router-dom";

const RecipeList = () => {
return (
    <div className="flex wrap full-width">
      {recipes.map((recipe) => {
        return (
          <RecipeCard
            category={recipe.category}
            color={recipe.color}
          />
        );
      })}
    </div>
  );
};

export default RecipeList;