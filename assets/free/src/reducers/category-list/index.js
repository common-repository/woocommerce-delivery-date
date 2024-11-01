import { createSlice } from "@reduxjs/toolkit";

export const theSlice = createSlice({
  name: 'category-list',
  initialState: {
    list: [],
    loaded: false,
  },
  reducers: {
    // section parts
    loadAllCategories: (state, action) => {
      const theList = action.payload;
      state.list = theList;
      state.loaded = true;
    },
  }
});

export const {
  loadAllCategories,
} = theSlice.actions;
export default theSlice.reducer;