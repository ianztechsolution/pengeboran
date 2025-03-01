class LocalStorageModel {
    constructor(key) {
        this.key = key;
        this.initStorage();
    }

    // Initialize storage if not exists
    initStorage() {
        if (!localStorage.getItem(this.key)) {
            localStorage.setItem(this.key, JSON.stringify([]));
        }
    }

    // Get all records
    all() {
        return JSON.parse(localStorage.getItem(this.key));
    }

    // Find a record by id
    find(id) {
        const items = this.all();
        return items.find((item) => item.id === id) || null;
    }

    // Create a new record
    create(data) {
        const items = this.all();
        const newItem = { id: Date.now(), ...data };
        items.push(newItem);
        this.save(items);
        return newItem;
    }

    // Update a record by id
    update(id, data) {
        let items = this.all();
        const index = items.findIndex((item) => item.id === id);

        if (index !== -1) {
            items[index] = { ...items[index], ...data };
            this.save(items);
            return items[index];
        }
        return null;
    }

    // Delete a record by id
    delete(id) {
        const items = this.all();
        const updatedItems = items.filter((item) => item.id !== id);
        this.save(updatedItems);
    }

    // Find the first record or create if not found
    firstOrCreate(condition, data) {
        const item = this.all().find((item) =>
            Object.entries(condition).every(
                ([key, value]) => item[key] === value
            )
        );

        if (item) {
            return item;
        }

        return this.create({ ...condition, ...data });
    }

    // Update the first matching record or create if not found
    updateOrCreate(condition, data) {
        const items = this.all();
        const index = items.findIndex((item) =>
            Object.entries(condition).every(
                ([key, value]) => item[key] === value
            )
        );

        if (index !== -1) {
            items[index] = { ...items[index], ...data };
            this.save(items);
            return items[index];
        }

        return this.create({ ...condition, ...data });
    }

    // Save data to localStorage
    save(items) {
        localStorage.setItem(this.key, JSON.stringify(items));
    }
}
