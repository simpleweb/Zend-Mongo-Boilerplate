db.user.ensureIndex({username: 1}, {unique: true});
db.user.ensureIndex({email: 1}, {unique: true});
db.space.ensureIndex({urlKey: 1}, {unique: true, dropDups: true});
db.invite.ensureIndex({email: 1}, {unique: true, dropDups: true});
db.application.ensureIndex({sortAppName: 1}, {unique: true, dropDups: true});
db.applicationCategory.ensureIndex({categoryName: 1}, {unique: true, dropDups: true});
db.token.ensureIndex({token: 1}, {unique: true, dropDups: true});
db.applicationUserData.ensureIndex({applicationInstall: 1, user: 1, key: 1}, {unique: true, dropDups: true});