const generateId = (list) => {
  let id = 0;
  for (let item of list) {
    if (id < item.id) {
      id = item.id;
    }
  }
  return id + 1;
};

export default generateId;