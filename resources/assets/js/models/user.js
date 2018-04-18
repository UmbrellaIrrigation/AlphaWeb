class User {
    constructor(data) {
        this.id = data.id;
        this.name = data.name;
        this.email = data.email;
        this.description = data.description;
        this.permission = data.permission;
        this.notification_preference = data.notification_preference;
        this.verified = data.verified;
    }
}

export default User;