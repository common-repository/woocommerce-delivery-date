import { configureStore } from '@reduxjs/toolkit';
import categoryListReducer from './reducers/category-list';

const store = configureStore({
  reducer: {
    categories: categoryListReducer,
  }
});

export default store;