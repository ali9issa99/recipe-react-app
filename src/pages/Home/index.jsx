import React, { useEffect, useState } from "react";
import "./style.css";
import RecipeCard from "../../components/RecipeCard";
// import QuizesList from "../../components/QuizList";

const Home = () => {
  return (
    <div className="flex column page ">
      <h2>4 recipes</h2>
      <RecipeCard/>
      <RecipeCard/>
      <RecipeCard/>
      <RecipeCard/>
    </div>
  );
};

export default Home;
