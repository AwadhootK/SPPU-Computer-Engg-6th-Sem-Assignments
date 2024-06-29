class BFS_DFS:
    def __init__(self):
        self.n = 7
        self.adjlist = [
            [1, 4],
            [0, 2, 3],
            [1],
            [1],
            [0, 5, 6],
            [4],
            [4]
        ]

    def bfs(self, s):
        visited = [False for i in range(self.n)]
        q = [s]

        while q != []:
            n = q.pop(0)
            if visited[n]:
                continue
            visited[n] = True
            print(n, end=' ')
            for x in self.adjlist[n]:
                if not visited[x]:
                    q.append(x)
        print()

    def dfs(self, s):
        visited = [False for i in range(self.n)]
        self.dfs_rec(s, visited)

    def dfs_rec(self, n, visited):
        if visited[n]:
            return
        print(n, end=' ')
        visited[n] = True
        for x in self.adjlist[n]:
            if not visited[x]:
                self.dfs_rec(x, visited)


gr = BFS_DFS()
gr.bfs(0)
gr.dfs(0)
