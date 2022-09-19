export function activate(index, array, deactivateOthers = true) {
    array.map((filter, fIndex) => {
        if (fIndex === index) filter.isActive = true;
        else if (deactivateOthers) filter.isActive = false;
        return filter;
    });
}
