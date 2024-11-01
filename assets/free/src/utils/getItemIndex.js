const getItemIndex = (findId, list) => {
  let index = -1;
  for (let i = 0; i<list.length; i++) {
    if (list[i].id === findId) {
      index = i;
      break;
    }
  }
  return index;
}
export default getItemIndex;