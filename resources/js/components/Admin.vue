<template>
	<v-app id="inspire">
		<v-navigation-drawer v-model="drawer" app clipped>
			<v-list dense>

				<v-list-item link to="/admin">
					<v-list-item-action>
						<v-icon>mdi-view-dashboard</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title>Dashboard</v-list-item-title>
					</v-list-item-content>
				</v-list-item>

				<v-list-group
					v-if="$auth.isAdmin()"
					v-for="item in items"
					:key="item.title"
					v-model="item.active"
					:prepend-icon="item.action"
					no-action
				>
					<template v-slot:activator>
						<v-list-item-content>
							<v-list-item-title v-text="item.title"></v-list-item-title>
						</v-list-item-content>
					</template>

					<v-list-item
						v-for="subItem in item.items"
						:key="subItem.title"
						@click=""
						:to="subItem.link"
					>
						<v-list-item-action>
							<v-icon>{{ subItem.action }}</v-icon>
						</v-list-item-action>
						<v-list-item-content>
							<v-list-item-title v-text="subItem.title"></v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</v-list-group>

				<v-list-item link to="/admin/settings">
					<v-list-item-action>
						<v-icon>mdi-settings</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title>Settings</v-list-item-title>
					</v-list-item-content>
				</v-list-item>

				<v-list-item link to="/admin/developer">
					<v-list-item-action>
						<v-icon>mdi-settings</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title>Developer</v-list-item-title>
					</v-list-item-content>
				</v-list-item>

			</v-list>
		</v-navigation-drawer>

		<v-app-bar app clipped-left >
			<v-app-bar-nav-icon @click.stop="drawer = !drawer" />
			<v-toolbar-title>Application</v-toolbar-title>
		</v-app-bar>

		<v-content>
			<v-container class="fill-height" fluid>

				<v-layout>
					<v-flex>
						<router-view></router-view>
					</v-flex>
				</v-layout>

			</v-container>
		</v-content>

		<v-footer app>
			<span>&copy; 2019</span>
		</v-footer>
	</v-app>
</template>

<script>
	export default {
		props: {
			source: String,
		},

		data: () => ({
			drawer: null,
			items: [
				{
					action: 'mdi-account-circle',
					title: 'User Management',
					active: false,
					items: [
						{ title: 'Users', action: 'mdi-account-circle', link: '/admin/users' },
						{ title: 'Roles', action: 'mdi-account-circle', link: '/admin/roles' },
						{ title: 'Permissions', action: 'mdi-account-circle', link: '/admin/permissions' },
					],
				},
			],
		}),

		created () {
			this.$vuetify.theme.dark = true
		},
	}
</script>